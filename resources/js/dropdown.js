// window.onload = () => {
//     let isVisible = false;
//     const dropdown = document.getElementById("custom-dropdown");
//     const inputs = [...document.querySelectorAll(".input")];
//     const dropdownPlaceholder = document.querySelector(".input-field-placeholder");
//     const checkedItems = [];

//     if (dropdown) {
//         const ul = dropdown.querySelector(".input-field-dropdown");
//         checkedItems.push(...ul.querySelectorAll("input:checked"));
//         if (checkedItems.length > 0) {
//             dropdownPlaceholder.textContent = `${checkedItems.length} delle tipologie disponibili selezionate`;
//         }

//         dropdown.addEventListener("click", (event) => {
//             if (event.target.tagName === "INPUT") {
//                 if (event.target.checked) checkedItems.push(event.target);
//                 else checkedItems.splice(checkedItems.indexOf(event.target), 1);

//                 if (checkedItems.length > 0)
//                     dropdownPlaceholder.textContent = `${checkedItems.length} delle tipologie disponibili selezionate`;
//                 else dropdownPlaceholder.textContent = `Seleziona la tipologia`;
//             }

//             if (!isVisible) {
//                 ul.style.display = "flex";
//                 isVisible = true;
//             } else {
//                 ul.style.display = "none";
//                 isVisible = false;
//             }
//         });

//         document.addEventListener("click", (e) => {
//             if (!dropdown.contains(e.target)) {
//                 ul.style.display = "none";
//                 isVisible = false;
//             }
//         });
//     }

//     if (inputs) {
//         inputs.forEach((input) => {
//             input.addEventListener("click", (event) => {
//                 inputs.forEach((input) => input.classList.remove("focused"));
//                 if (!input.classList.contains("focused")) {
//                     input.classList.add("focused");
//                 } else input.classList.remove("focused");
//             });

//             input.addEventListener("focusin", (event) => {
//                 inputs.forEach((input) => input.classList.remove("focused"));
//                 if (!input.classList.contains("focused")) {
//                     input.classList.add("focused");
//                 }
//             });

//             document.addEventListener("click", (e) => {
//                 inputs.forEach((input) => {
//                     if (!input.contains(e.target)) {
//                         input.classList.remove("focused");
//                     }
//                 });
//             });
//         });
//     }
// };
window.onload = () => {
    let isOpen = false;
    let checkedItems = [];
    const customSelect = document.querySelector(".custom-select");
    const customSelectLabel = document.querySelector(".custom-select-label");
    const customSelectDropdown = document.querySelector(
        ".custom-select-dropdown"
    );

    const cs = document.querySelector(".custom-select");

    if (customSelect && customSelectDropdown) {
        document.addEventListener("click", (event) => {
            if (!customSelect.contains(event.target)) {
                customSelectDropdown.classList.remove("visible");
                isOpen = false;
            }
        });

        customSelect.addEventListener("click", (event) => {
            if (!isOpen) {
                customSelectDropdown.classList.add("visible");
                isOpen = true;
            } else {
                customSelectDropdown.classList.remove("visible");
                isOpen = false;
            }
        });

        customSelect.addEventListener("click", (event) => {
            if (event.target.tagName === "INPUT") {
                if (event.target.checked) checkedItems.push(event.target);
                else checkedItems.splice(checkedItems.indexOf(event.target), 1);

                if (checkedItems.length > 0)
                    (customSelectLabel.textContent = `${checkedItems.length} tipologia selezionata`),
                        (customSelectLabel.style.color = "#282828");
                else
                    (customSelectLabel.textContent = `Seleziona una tipologia`),
                        (customSelectLabel.style.color = "#c4c4c4");
            }
        });

        window.addEventListener("resize", (event) => {
            customSelectDropdown.classList.remove("visible");
            isOpen = false;
        });
    }
};
