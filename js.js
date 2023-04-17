const form = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const content = document.querySelector(".content");

form.addEventListener("submit", (event)=> {
    event.preventDefault(); //отмена действий по умолчанию
    console.log("Алло");
    let formData = new FormData(form);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insertStudent.php");
    xhr.send(formData); //отправка данных на сервер
    xhr.onload = () =>{
        if(xhr.response == "ok"){
            msg.innerHTML="YES";
            msg.classList.add("success");
            msg.classList.add("show-message");
            let div = document.createElement("div");
            let fname = formData.get("fname");
            let lname = formData.get("lname");
            let age = formData.get("age");
            let gender = formData.get("gender");
            div.innerHTML = `${fname},${lname},${gender},${age}`;
            content.append(div);
        }else{
            msg.innerHTML="NO";
            msg.classList.add("reject");
            msg.classList.add("show-message");
        }
    };
});

