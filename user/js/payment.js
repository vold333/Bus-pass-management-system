console.log("payment_display file is connected")
console.log("hii")

let display=document.querySelector("#display")
display.textContent=localStorage.getItem("amount")
let id=localStorage.getItem("id")
console.log("id is  "+id)



let run=()=>{

 alert("payment successful! After verification of details you will receive your pass in postal within 3 days. ")
 window.location="add-pass.php"

 }
    
