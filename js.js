const form = document.getElementById("form-insert-student");

form.addEventListener("submit", (event)=> {
    event.preventDefault(); //отмена действий по умолчанию
    console.log("Алло");
    let formData = new FormData(form);

    let xhr = XMLHttpRequest();
    xhr.open("POST", "insertStudent.php");
    xhr.send(formData); //отправка данных на сервер
    xhr.onload = () =>{console.log(xhr.response)};
});

