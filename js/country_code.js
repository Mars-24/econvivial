const countryStateInfo = {
  Bénin:{
    "+229 ":["Atacora", "Donga", "Bogou", "Alibori",
      "Atlantique", "Littoral", "Mono", "Couffo", "Ouémé",
      "Plateau", "Zou", "Collines"],
  },
  "Burkina Faso":{
    "+226 ":["Boucle du Mouhoun", "Cascade",
      "Centre", "Centre – Est", "Centre Nord", "Centre-Ouest", "Centre Sud", "Est", "Haut Bassins", "Nord",
      "Plateau Central", "Sahel", "Sud-Ouest"],
  },
  "Cap Vert":{
    "+238 ":["Boa Vista", "Brava", "Calheta", "Maio",
      "Mosteiros", "Paul", "Praia", "Porto Novo", "Ribeira Grande", "Sal", "Santa Catarina", "Santa Cruz", "São Domingos", "São Nicolau", "São Filipe", "São Vicente","Tarrafal"]
  },
  "Côte d’Ivoire":{
    "+225 ":["Abidjan", "Bas-Sassandra", "Comoé",
      "Denguélé", "Gôh-Djiboua", "Lacs", "Lagunes",
      "Montagnes", "Sassandra-Marahoué", "Savanes",
      "Vallée du Bandama", "Woroba", "Yamoussoukro",
      "Zanzan"]
  },
  "Gambie":{
    "+220 ":["Greater Banjul", "West Coast", "North Bank", "Lower River", "Central River", "Upper River"]
  },
  "Ghana":{
    "+233 ":["Ashanti", "Brong Ahafo", "Centrale",
      "Haut Ghana oriental", "Grand Accra", "Nord",
      "Occidentale", "Orientale", "Haut Ghana occidental",
      "Volta"]
  },
  "Guinée":{
    "+224 ":["Guinée maritime", "Moyenne Guinée",
      "Haute Guinée", "Guinée forestière"]
  },
  "Guinée Bissau":{
    "+245 ":["Bafatá", "Biombo", "Bolama-Bijagos",
      "Cacheu", "Gabu", "Oio", "Quinara", "Tombali"]
  },
  "Libéria":{
    "+231 ":["Bomi", "Bong", "Gbarpolu", "Grand Bassa", "Grand Cape Mount", "Grand Gedeh",
      "Grand Kru", "Lofa", "Margibi", "Maryland,Montserrado", "Nimba", "River Cess", "River Gee","Sinoe"]
  },
  "Mali":{
    "+223 ":["Kayes", "Koulikoro", "Sikasso", "Ségou",
      "Mopti", "Tombouctou", "Gao","Kidal", "Ménaka","Taoudénit"]
  },
  "Niger":{
    "+227 ":["Agadez", "Diffa", "Dosso", "Maradi",
      "Niamey", "Tahoua", "Tillabéri","Zinder"]
  },
  "Nigeria":{
    "+234 ":["Abia", "Adamawa", "Akwa Ibom",
      "Anambra", "Bayelsa", "Bauchi", "Benue", "Borno",
      "Cross River", "Delta", "Eboniyi", "Edo", "Ekiti", "Enugu",
      "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina",
      "Kebbi", "Kogi", "Kwara", "Lagos", "Nassarawa", "Niger",
      "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers",
      "Sokoto", "Taraba", "Yobe","Zamfara"]
  },
  "Senegal":{
    "+221 ":["Dakar", "Diourbel", "Fatick", "Kaolack",
      "Kolda", "Louga", "Matam", "St Louis",
      "Tambacounda", "Thiès", "Ziguinchor", "Kaffrine",
      "Kédougou", "Sédhiou"]
  },
  "Sierra Leone":{
    "+232 ":["Bo", "Bonthe","Moyamba", "Pujehun"]
  },
    Togo:{
      "+228 ":["Grand lomé","Maritime","Plateaux","Centrale","Kara","Savane"],
    }
  };

window.onload = function(){

   const countrySelection = document.querySelector("#countries_states1");
   const citySelection = document.querySelector('#countries_state');
   const numberSelection = document.querySelector('#number');

   citySelection.disabled=true;
   numberSelection.disabled=true;

   for (let country in countryStateInfo ){
    countrySelection.options[countrySelection.options.length] = new Option( country,country);
  }
//todo Country change 
  countrySelection.onchange = (e)=>{
    citySelection.disabled = false;
    numberSelection.disabled=false;
    citySelection.length =1;
    numberSelection.length =1;

    let cityInfo = Object.values(countryStateInfo[e.target.value])[0];

    console.log('la city est :',cityInfo);

    cityInfo.forEach(function (item, index) {
      citySelection.options[citySelection.options.length] = new Option( item,item);
    });
    
    // for (let city in cityInfo ){
    //   console.log('la city est :',city);

    // }
    number = Object.keys(countryStateInfo[e.target.value]).toString();
    numberSelection.value=number;
    // for (let number in countryStateInfo[e.target.value] ){
    //   console.log(number);
    //   numberSelection.value=number;
    // }
    // for (let city in countryStateInfo[0][e.target.value] ){
    //   citySelection.options[citySelection.options.length] = new Option( city,city);
    // }

  }
}
