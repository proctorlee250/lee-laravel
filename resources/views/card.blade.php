<div id="game">

    <p>Current Card: {{$firstCard->value}} - {{$firstCard->suit}}</p>
    <form id="card-form" action="{{ route('submitForm') }}" method="POST">
        @csrf
        <input type="hidden" id="first-card-value" name="firstCard" value="{{$firstCard->value}}">
        <input type="hidden" id="second-card-value" name="secondCard" value="{{$firstCard->value}}">
        
        <input type="radio" id="higher" name="guess" value="higher">
        <label for="higher">Higher</label><br>
        
        <input type="radio" id="lower" name="guess" value="lower">
        <label for="lower">Lower</label><br>  
        
        <input type="submit" value="Submit">
    </form>
    <p id="guess-result"></p>
</div>