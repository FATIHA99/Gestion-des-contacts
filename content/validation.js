///to add contact
let namevalidate = document.querySelector("#name");
let email = document.querySelector('#email');
let phone = document.querySelector('#phone');
let adress = document.querySelector('#adress');
formAdd.addEventListener("submit", e => {
    if (!validationAdd())
        e.preventDefault();
})

function validationAdd() {

    let isValidate = true;
    // name

    if (namevalidate.value.trim() == '') {
        AfficherError(namevalidate, 'name can not be empty');
        isValidate = false;
    } else if (namevalidate.value.trim().length <= 2) {
        AfficherError(namevalidate, 'name must greater than 2 character ');
        isValidate = false;
    } else
        valider(namevalidate);
    // phone
    if (phoneValider(phone.value)) {
        valider(phone);
    } else if (phone.value == '') { //facultative
        isValidate = true;

    } else {
        AfficherError(phone, 'phone not valid ');
        isValidate = false
    }
    // email

    if (email.value.trim() == '') {
        AfficherError(email, 'email can not be empty');
        isValidate = false;
    } else if (EmailValider(email.value))
        valider(email);
    else {
        AfficherError(email, 'your email format is not valide')
        isValidate = false
    }
    //  adresse 
    if (adress.value.trim().length >= 4) {
        AfficherError(adress, 'max character is 255 ');
        adress.style = ' border-color:red';
        isValidate = false;
    } else if (adress == '') {
        isValidate = true;
    }



    return isValidate;
}
// affichage de message 
function AfficherError(element, errorMessage) {

    const parent = element.parentElement;
    if (parent.classList.contains('success'))
        parent.classList.remove('success');
    parent.classList.add('error');
    const para = parent.querySelector('p');
    para.innerText = errorMessage;
    para.style.visibility = 'visible';

}
// si les valeur est valid  :
function valider(element) {
    const parent = element.parentElement;
    if (parent.classList.contains('error')) {
        parent.classList.remove('error');
        parent.querySelector('p').style.visibility = 'hidden';
    }
    parent.classList.add('success');
}
// expression regulier pour email :
function EmailValider(email) {
    const format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return format.test(email);
}
// phone expression : +91 (123) 456-7890
function phoneValider(phone) {
    const format = /^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;
    return format.test(phone);
}