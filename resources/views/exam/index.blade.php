<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deneme Sınavı Demo Sayfası</title>
    <!-- add bootstrap 5 --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #exam-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .question {
            margin-bottom: 20px;
            text-align: center;
        }
        .options {
            display: flex;
            justify-content: space-around;
        }
        .option {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    

    <div id="exam-container">

    <div class="question"></div>

    <div class="options">

        <button class="option" data-option="A">A</button>
        <button class="option" data-option="B">B</button>
        <button class="option" data-option="C">C</button>
        <button class="option" data-option="D">D</button>

    </div>

    <div style="text-align: center; margin-top: 20px;">
        <button id="prev-question-btn">Önceki Soru</button>
        <button id="next-question-btn">Sonraki Soru</button>
    </div>


    <div style="text-align: right; margin-top: 20px;">
        <button id="submit-exam-btn">Sınavı Bitir</button>
    </div>

    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // jquery
    
    $(document).ready(function() {
        const studentId = 30;
        let questions = [
            {   questionImg: "question_1.jpg" },
            {   questionImg: "question_2.jpg" },
            {   questionImg: "question_3.jpg" },
            {   questionImg: "question_4.jpg" },
            {   questionImg: "question_5.jpg" }
        ];

        let answers = [null, null, null, null, null];

        let currentQuestionIndex = 0;


        function loadQuestion(index) {
            const question = questions[index];
            $('.question').html('<img src="{{asset("assets/img/exam1")}}/' + question.questionImg + '" alt="Question Image" style="max-width: 100%;">');
        }

        $('.option').click(function() {
            const selectedOption = $(this).data('option');
            answers[currentQuestionIndex] = selectedOption;
            console.log(answers);
            colorAnswerButtons()
        });

        $('#next-question-btn').click(function() {
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                loadQuestion(currentQuestionIndex);
            }

            if(currentQuestionIndex === questions.length -1){
                $('#next-question-btn').hide();
            }
            colorAnswerButtons()
        });

        $('#prev-question-btn').click(function() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                loadQuestion(currentQuestionIndex);
            }
            $('#next-question-btn').show();
            colorAnswerButtons()
        });

        function colorAnswerButtons() {
            $('.option').each(function() {
                const option = $(this).data('option');
                if (answers[currentQuestionIndex] === option) {
                    $(this).css('background-color', 'lightgreen');
                } else {
                    $(this).css('background-color', '');
                }
            });
        }

        $('#submit-exam-btn').click(function() {
            console.log('Sınav tamamlandı. Cevaplar:', answers);
            alert('Sınav tamamlandı. Cevaplar konsola yazdırıldı.');
        });

        loadQuestion(currentQuestionIndex);
    });






</script>
</body>
</html>