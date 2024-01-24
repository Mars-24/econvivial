                     
URL = window.URL || window.webkitURL;

var gumStream; //STREAM FROM getUserMedia() 
var rec;       //RECORDER.js OBJECT
var input;     //MediaStreamAudioSourceNode WE'LL BE RECORDING

// AUDIO CONTEXT SHIMING IF ONE NOT AVAILABLE
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext; //AUDIO CONTEXT HEP US TO RECORD

var recordButton = $('#recordButton');
var stopButton = $('#stopButton');
var pauseButton = $('#pauseButton');

var recorder_start=null;

//RECORDER EVENTS BUTTONS 
recordButton.on('click', startRecording);
stopButton.on('click', stopRecording);
pauseButton.on('click', pauseRecording);

// START RECORDING FUNCTION
function startRecording() {
    console.log("recordButton clicked");

    var constraints = { audio: true, video:false }
   

    navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
        console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

        audioContext = new AudioContext();

        //UPDATE RECORDER INFO
        $('#recorder-info').css({'margin':'-10px 0 0 150px'});
        document.getElementById("recorder-info").innerHTML="Enregistrement en cours ...";

        // ASSIGN STREAM TO ANOTHER VAR FOR LATER USE
        gumStream = stream;
    
        // STREAM USING
        input = audioContext.createMediaStreamSource(stream);

       // WE RECORD ON MONO CHANNEL TO REDUCE FILE WEIGHT
        rec = new Recorder(input,{numChannels:1});

        // IF getUserMedia() SUCCESS
        recordButton.addClass('waves').css({'pointer-events':'none'});
        $('#recorder-controls').fadeIn('slow').removeClass('hide').addClass('animated heartBeat').css({'display':'inline-block'});

        $('#recordingsList').html("");

        //START RECORDING PROCESS
        rec.record();

        recorder_start=true;

        console.log("Recording started ....");

    }).catch(function(err) {
        // IF getUserMedia() FAILS
        recordButton.removeClass('waves').css({'pointer-events':''});
        $('#recorder-controls').fadeOut('slow').addClass('hide').removeClass('animated heartBeat').css({'display':'none'});
    });
}

// PAUSE/RESUME RECORDING FUNCTION
function pauseRecording(){
    console.log("pauseButton clicked rec.recording=",rec.recording );
    // IF PAUSE BUTTON CLICKED
    if (rec.recording){
        //PAUSE RECORD
        rec.stop();
        recordButton.removeClass('waves').addClass('animated flash infinite slow');
        $('#pauseButton').fadeIn('slow').removeClass('fa-pause').addClass('fa-play');

        //UPDATE RECORDER INFO
        document.getElementById("recorder-info").innerHTML="Enregistrement en pause ...";
    }
    // IF RESUME BUTTON CLICKED
    else{
        //RESUME RECORD
        rec.record();
        recordButton.addClass('waves').removeClass('animated flash infinite slow');
        $('#pauseButton').fadeIn('slow').removeClass('fa-play').addClass('fa-pause');

        //UPDATE RECORDER INFO
        document.getElementById("recorder-info").innerHTML="Enregistrement en cours ...";
    }
}

// STOP RECORDING FUNCTION
function stopRecording() {
    console.log("stopButton clicked");

    //UPDATE RECORDER INFO
    document.getElementById("recorder-info").innerHTML="Enregistrement terminé ...";
    $('#recorder-info').css({'margin':'0'});

    //WE DISBALE THE RECORD CONTROLS BUTTONS
    recordButton.removeClass('waves flash infinite slow').css({'pointer-events':''});
    $('#recorder-controls').fadeOut('slow').addClass('hide').removeClass('animated heartBeat').css({'display':'none'});
    
    // WE RESET PAUSE BUTTON IN CASE OF THE RECORDING IS STOPPED WHILE PAUSED
    $('#pauseButton').fadeIn('slow').removeClass('fa-play').addClass('fa-pause');
    
    //WE TELL THE RECORDER TO STOP RECORDING
    rec.stop();
    recorder_start=false;

    //WE STOP THE MICROPHONE ACCESS
    gumStream.getAudioTracks()[0].stop();

    //WE CREATE BLOB FILE AND PASS IT IN DOWNLOAD LINK
    rec.exportWAV(createDownloadLink);
}

// DOWNLOAD/UPLOAD LINK FUNCTION
function createDownloadLink(blob) {
    
    var url = URL.createObjectURL(blob);

    var au = new Audio();
    au.autoplay = false;
 
    var div = document.createElement('div');

    // WE GIVE THE DATETIME MOMENT FOR THE NAME OF FILE WITHOUT EXTENSION
    var filename = new Date().toISOString();

    // WE ADD CONTROLS AND SCR TO THE AUDIO ELEMENT
    au.controls = true;
    au.src = url;

    //ADDING THE NEW AUDIO IN DIV ELEMENT
    div.appendChild(au);
    
    
    //**UPLOAD LINK !IMPORTANT
    var upload = document.createElement('a');
    upload.style.cursor="pointer";
    //upload.className="btn btn-fab btn-round btn-raised btn-<?=$getColor->color_name?>";
    upload.style.margin="-25px 0 0 0";
    upload.innerHTML = '<i class="fa fa-send"></i>';
    
    upload.addEventListener("click", function(event){
          var xhr=new XMLHttpRequest();
          xhr.onload=function(e) {
              if(this.readyState === 4) {
                  console.log("Server returned: ",e.target.responseText);
              }
          };
          var fd=new FormData();
          fd.append("audio_data",blob, filename);
          xhr.open("POST","ajax/upload-microphoneCapture.ajax.php",true);
          xhr.send(fd);
          close_recorder();
    })

    div.appendChild(upload);//WE ADD UPLOAD LINK
    recordingsList.appendChild(div); //WE ADD AUDIO ELEMENT IN RECORDING LIST
}

// CLOSING MICROPHONE FUNCTION
function close_recorder(){
    console.log("Closing recorder ...")
    // WE RESET RECORDER BUTTON
    recordButton.removeClass('waves flash infinite slow').css({'pointer-events':''});
    $('#recorder-controls').fadeOut('slow').addClass('hide').removeClass('animated heartBeat').css({'display':'none'});
    
    // WE RESET PAUSE BUTTON IN CASE OF THE RECORDING IS STOPPED WHILE PAUSED
    $('#pauseButton').fadeIn('slow').removeClass('fa-play').addClass('fa-pause');
    
    $('#recordingsList').html("");
    //UPDATE RECORDER INFO
    document.getElementById("recorder-info").innerHTML="";
    $('#recorder-info').css({'margin':'0'});
    
    // HIDING MODAL
    $('#input-record').modal('hide');

    if (recorder_start) {
        //WE STOP THE MICROPHONE ACCESS
        gumStream.getAudioTracks()[0].stop();

        //WE TELL THE RECORDER TO STOP RECORDING
        rec.stop();
    }
}
                      