// Show and hide password
function toggleShowPassword(parentId) {
    const parent = document.getElementById(parentId);

    const input = parent.querySelector("input");
    const eye_on = parent.querySelector(".eye-on");
    const eye_off = parent.querySelector(".eye-off");

    if (input.type === "password") {
        input.type = "text";
        eye_on.style.display = "none";
        eye_off.style.display = "block";
    } else {
        input.type = "password";
        eye_on.style.display = "block";
        eye_off.style.display = "none";
    };
};

// Smart otp inputs focus
function smartOtpFocus(otpClass) {
    const inputs = document.querySelectorAll(otpClass);
    inputs.forEach((input, index) => {
        input.addEventListener("keyup", (e) => {
            if (e.target.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            };
        });

        input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace") {
                if (e.target.value === "" && index > 0) {
                    inputs[index - 1].focus();
                    inputs[index - 1].value = "";
                    e.preventDefault();
                };
            };
        });
    });
};