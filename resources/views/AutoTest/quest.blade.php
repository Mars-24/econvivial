@extends('AutoTest.templatequest')

@section('question')
    <form method="get" class="question-form" id="question-form" action="{!! url('/auto-test/questions', [$num + 1]) !!}">
        <div class="question">
            <div class="question-header">
                <a href="javascript:history.back()">
                    <img src="/data/icon-chevron-right.svg" alt="Retour à la question précédente">
                    &nbsp;
                    Question {{ $num }} sur 15
                </a>
            </div>
    
            <p class="question-title">
               {{ $q1 }}
            </p>
    
            <p class="question-options-indication">Sélectionnez une option :</p>
            
            <!-- <div class="question-options">
              <a href="index.html" class="question-options-link"''
              >Découvrir la liste des pays et zones à risque</a
              >
            </div> -->
            
            <div class="question-options">
                <div class="flex-direction-row">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="input-radio-step_fever-on" name="rep" value="1" required="" tabindex="1">
                        
                        <label for="input-radio-step_fever-on">
                            Oui
                            <span class="hover-border"></span>
                        </label>
                    </div>
                    
                    <div class="custom-control custom-radio">
                        <input type="radio" id="input-radio-step_fever-off" name="rep" value="0" required="" tabindex="2">
                        
                        <label for="input-radio-step_fever-off">
                            Non
                            <span class="hover-border"></span>
                        </label>
                    </div>
                </div>
            </div>
@endsection

@section('conseil')
    <div class="warning-form">
        <p class="warning-form-title">Alerte sur la Chloroquine !</p>
        <p>
            Au Togo, la Chloroquine va être temporairement retirée du circuit formel et ne sera plus disponible en vente libre dans les officines. L’automédication par la Chloroquine est un danger pour la santé de la population. La prise en charge des malades du COVID-19 se fait uniquement par le Ministère de la Santé à travers des centres spécialement organisés sur l'ensemble du territoire national et les traitements se font sous surveillance médicale.
        </p>
    </div>
@endsection

@section('foot', 'pied de page')
