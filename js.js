const form1 = document.getElementById("form-insert-student");
const form2 = document.getElementById("form-insert-group");
const msg = document.querySelector(".message");
const content = document.querySelector(".content");



//отпарвка данных через форму
form1.addEventListener("submit", (event)=> {
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

//------------------------------------------------------------------------------
// form2.addEventListener("submit", (event)=> {
//     event.preventDefault(); //отмена действий по умолчанию
//     console.log("Алло");
//     let formData = new FormData(form);

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "insertGroup.php");
//     xhr.send(formData); //отправка данных на сервер
//     xhr.onload = () =>{
//         if(xhr.response == "ok"){
//             msg.innerHTML="YES";
//             msg.classList.add("success");
//             msg.classList.add("show-message");
//             let div = document.createElement("div");
//             let fname = formData.get("groups_id");
//             let lname = formData.get("title");
//             div.innerHTML = `${groups_id},${title}`;
//             content.append(div);
//         }else{
//             msg.innerHTML="NO";
//             msg.classList.add("reject");
//             msg.classList.add("show-message");
//         }
//     };
// });

//отправка данных без формы, метод get 

//(лайки у сстудентов)
btnsLike = document.querySelectorAll(".like");
function setLike(str1, str2){
    return function(event){
        let idStudent = event.target.closest(".student").dataset.id;
        console.log(idStudent);
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "api/setLike.php?id=" + idStudent);
        xhr.onload = function(){
            if(xhr.response == "ok"){
                let num = +event.target.closest(".student").querySelector(".num-like").innerHTML;
                event.target.closest(".student").querySelector(".num-like").innerHTML = num + 1;
                console.log(str1);
            }
            else{
                console.log(str2);
            }
        };
        xhr.send();
    }
}
for (btn of btnsLike){
    btn.addEventListener("click", setLike("успешно","не успешно"));
}

function getRandomInt(max){
    return Math.floor(Math.random()*max);
}

const myPromise = new Promise((resolve,reject)=>{
    console.log("i am promise");
    let num;
    setTimeout(() => {
        num = getRandomInt(10);
        console.log(num);
        if(num >= 5){
            resolve(num);
        }else{
            reject("плохо! число меньше 5");
        }
    }, 500);
});

myPromise
.then(
    (result)=>{
        console.log(result);
        result++;
        console.log(result);
        return result;
    }
)
.then(
    (result)=>{console.log(result*2)}
)
.catch(
    (result)=>{console.log(result)}
)
.finally(

);