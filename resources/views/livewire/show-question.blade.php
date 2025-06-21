<div>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title">{{ $data[$counter]->title }}</h5>
                @foreach(preg_split('/(-)/', $data[$counter]->answers) as $index=>$answer)
                    <div class="custom-control custom-radio">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $index }}" wire:model="selectedAnswer" value="{{ $answer }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $index }}" wire:click="nextQuestion({{$data[$counter]->id}}, {{$data[$counter]->score}}, '{{$answer}}', '{{$data[$counter]->rightAnswer}}')"> {{$answer}}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('livewire:load', function() {
        Livewire.hook('message.processed', () => {
            resetRadioButtons();
        });
    });

    // Reset radio buttons
    function resetRadioButtons() {
        var radioButtons = document.querySelectorAll('input[name="flexRadioDefault"]');
        radioButtons.forEach(function(radioButton) {
            radioButton.checked = false;
        });
    }
</script>
