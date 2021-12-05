const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("containerForm");

signUpButton.addEventListener("click", () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
	container.classList.remove("right-panel-active");
});

function activarcaja(){
    if(check.checked) {
      document.getElementById('boton').disabled=true
    } else {
      document.getElementById('boton').disabled=false
    }
  }

 