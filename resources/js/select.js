import dayjs from "dayjs";

window.onload = () => {
    const fileField = document.querySelector(".custom-file");
    const fileFieldLabel = document.querySelector(".custom-file-label");
    const fileFieldInput = document.querySelector(".custom-file input");

    const customSelect = document.querySelector(".custom-select");

    if (customSelect) {
        const select = customSelect.querySelector("select");
        const dropDown = document.querySelector(".custom-select-dropdown");
        const realSelectLabel = customSelect.querySelector(
            ".custom-select-label"
        );

        if (select.querySelector("option[selected]")) {
            realSelectLabel.textContent =
                select.querySelector("option[selected]").text;
            realSelectLabel.style.color = "#282828";
        } else {
            select.firstElementChild.setAttribute("selected", true);
            realSelectLabel.textContent =
                select.querySelector("option[selected]").text;
            realSelectLabel.style.color = "#282828";
        }

        customSelect.addEventListener("mousedown", (e) => {
            e.preventDefault();
            dropDown.classList.add("visible");

            [...select.children].forEach((option, index) => {
                const opt = customSelect.querySelectorAll("li");

                opt[index].addEventListener("mousedown", (e) => {
                    e.stopPropagation();
                    realSelectLabel.textContent = option.text;
                    realSelectLabel.style.color = "#282828";
                    customSelect.value = option.value;
                    select.value = option.value;

                    dropDown.classList.remove("visible");
                });

                //    dropDown.appendChild(opt);
            });

            document.addEventListener("click", (evt) => {
                if (!customSelect.contains(evt.target))
                    dropDown.classList.remove("visible");
            });
        });
    }

    if (fileField) {
        fileFieldInput.addEventListener("change", (event) => {
            console.log("ok sono qui");
            fileFieldLabel.textContent = fileFieldInput.files[0].name;
            fileFieldLabel.style.color = "#545454";
        });

        const sidebtn = document.getElementById("sidebtn");
        const customForm = document.querySelector(".custom-form");
        const customFormBtn = customForm.querySelector(".close-button");

        if (sidebtn && customForm && customFormBtn) {
            sidebtn.addEventListener("click", (event) =>
                customForm.classList.toggle("open")
            );
            customFormBtn.addEventListener("click", (event) =>
                customForm.classList.toggle("open")
            );

            window.addEventListener("resize", (event) =>
                customForm.classList.remove("open")
            );
        }
    }

    const fieldDate = document.querySelectorAll("#field-date");
    if (fieldDate) {
        fieldDate.forEach((element) => {
            const date = element.firstElementChild.textContent;
            element.innerHTML = `<span>${dayjs(date)
                .locale("it")
                .format("MM/DD/YYYY")}</span>`;
        });
    }

    const fieldPrice = document.querySelectorAll("#field-price");
    if (fieldPrice) {
        fieldPrice.forEach((element) => {
            const price = element.firstElementChild.textContent;
            const text = parseFloat(price).toLocaleString("it-IT", {
                style: "currency",
                currency: "EUR",
            });
            console.log(text);
            element.innerHTML = `<span>${text}</span>`;
        });
    }

    const label = document.querySelector(
        ".custom-container-wrapper-panel-quotes-text-quote-sentence"
    );
    const name = document.querySelector(
        ".custom-container-wrapper-panel-quotes-user-name"
    );
    if (label) {
        const users = [
            {
                id: 0,
                name: "Luigi Ragusa",
                sentence:
                    "Uno dei migliori servizi che ho trovato sul mercato. Mi permette di gestire la mia attività con comodità e in tutta sicurezza.",
            },
            {
                id: 1,
                name: "Misia Pierobon",
                sentence:
                    "Non ci sente mai soli mentre si mangiano gli spaghetti. Richiedono troppa attenzione",
            },
            {
                id: 3,
                name: "Luigi Russo",
                sentence:
                    "La mia attività è cambiata da quando uso DeliveBoo. 5 stelle meritate",
            },
            {
                id: 4,
                name: "Federico Trimarco",
                sentence:
                    "Come CEO di DeliveBoo posso dire che il nostro è un ottimo servizio!!!",
            },
        ];

        let index = 0;
        let count = 100;
        let counter = setInterval(timer, 5000);

        function timer() {
            count = count - 1;
            if (count <= 0) {
                clearInterval(counter);
                return;
            }
            let user = users[index];
            name.textContent = "- " + user.name;
            label.textContent = user.sentence;
            index < users.length - 1 ? index++ : (index = 0);
        }
    }
};
