window.onload = () => {
    let isVisible = false;
    const dropdown = document.getElementById("custom-dropdown");
    const ul = dropdown.querySelector(".input-field-dropdown");
    const inputs = [...document.querySelectorAll(".input")];
    const dropdownPlaceholder = document.querySelector(
        ".input-field-placeholder"
    );
    const checkedItems = [];

    if (dropdown) {
        checkedItems.push(...ul.querySelectorAll("input:checked"));
        if (checkedItems.length > 0) {
            dropdownPlaceholder.textContent = `${checkedItems.length} delle tipologie disponibili selezionate`;
        }

        dropdown.addEventListener("click", (event) => {
            if (event.target.tagName === "INPUT") {
                if (event.target.checked) checkedItems.push(event.target);
                else checkedItems.splice(checkedItems.indexOf(event.target), 1);

                if (checkedItems.length > 0)
                    dropdownPlaceholder.textContent = `${checkedItems.length} delle tipologie disponibili selezionate`;
                else dropdownPlaceholder.textContent = `Seleziona la tipologia`;
            }

            if (!isVisible) {
                ul.style.display = "flex";
                isVisible = true;
            } else {
                ul.style.display = "none";
                isVisible = false;
            }
        });

        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target)) {
                ul.style.display = "none";
                isVisible = false;
            }
        });
    }

    if (inputs) {
        inputs.forEach((input) => {
            input.addEventListener("click", (event) => {
                inputs.forEach((input) => input.classList.remove("focused"));
                if (!input.classList.contains("focused")) {
                    input.classList.add("focused");
                } else input.classList.remove("focused");
            });

            document.addEventListener("click", (e) => {
                inputs.forEach((input) => {
                    if (!input.contains(e.target)) {
                        input.classList.remove("focused");
                    }
                });
            });
        });
    }
};
