function confirmSubmit() {
    var titleInput = document.forms["myForm"]["titlesuggestion"].value;
    var emailInput = document.forms["myForm"]["emailsuggest"].value;
    var dateInput = document.forms["myForm"]["date"].value;
    var descInput = document.forms["myForm"]["desc"].value;

    if(titleInput == "") {
        alert("Title section need to fill out.");
        return false;
    }
    else if (emailInput == "") {
    alert("Email details need to fill out.");
    return false;

}else if (dateInput == "") {
    alert("Date details need to fill out.");
    return false;
} else if (descInput == ""){
    alert("Please fill the description.");
    return false;
}else{
    var answer = confirm("Are you sure want to submit this suggestion?");

    if(answer){
        alert("Thanks for your suggesttion");
        window.location.href = "index.html";
    }else{
        alert("Please give me suggestion");
        window.location.href = "suggestion.html";
    }    

}
}

    if (confirmSubmit() == true) {
}



function contact() {
    var answer = confirm("Are you sure want to leave this page and redirect to www.linkedin.com?");

    if(answer){
        window.location.href = "https://www.linkedin.com/in/wan-muhammad-fikri-wan-badrulzaman-b5898a198/";
    }else{
        alert("Thanks to stay on this page.")
    }
}
