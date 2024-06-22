let questions = document.querySelectorAll("#question");
let answers = document.querySelectorAll("#answer");

for (let i = 0; i < questions.length; i++) {
    questions[i].addEventListener("click", function() {
        if (answers[i].style.display === "block") {
            answers[i].style.display = "none";
            questions[i].style.height = "";
            questions[i].style.background = "";
        } else {
            answers[i].style.display = "block";
            questions[i].style.height = "213px";
            questions[i].style.background = "#C09D9D";
        }
    });
}