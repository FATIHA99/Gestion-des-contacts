// login

// function fermer() {
//     document.getElementById("form_parent").style.display = "none";
// }

// function show_modal() {
//     document.getElementById("form_parent").style.display = "flex";
//     document.querySelector(".blur").style.display = "blur(30px);";

// }
// function closer() {
//     document.getElementById("form_parent2").style.display = "none";

// }

// function moda() {

//     document.getElementById("form_parent2").style.display = "flex";
//     document.querySelector(".blur").style.display = "blur(30px);";
// }

btnEdits = document.querySelectorAll('.dataEdit');
btnEdits.forEach(btn => {
    btn.addEventListener("mouseover", function() {
        let data = this.getAttribute("data");
        let arr = data.split(',');
        document.getElementById("name").value = arr[1];
        document.getElementById("phone").value = arr[2];
        document.getElementById("email").value = arr[3];
        document.getElementById("adress").value = arr[4];
    })
})

function show_modalEdit() {

    document.querySelector(".parentt").style.display = "block";

}

function ferme() {
    document.querySelector(".parentt").style.display = "none";
}

btns = document.querySelectorAll(".btnDelete");
btns.forEach(d => {
    d.addEventListener("click", function() {
        document.querySelector(".alert").style.display = "block";
        document.getElementById("idForDelete").value = this.getAttribute('data');
    });
});



function closeAlert() {
    document.querySelector(".alert").style.display = "none";
    header('location:list.hp');
}