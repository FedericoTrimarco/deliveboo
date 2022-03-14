// prettier-ignore
window.onload = () => {
    const label = document.querySelector(".custom-container-wrapper-panel-quotes-text-quote-sentence");
    const name = document.querySelector(".custom-container-wrapper-panel-quotes-user-name");
    if (label) {
        const users = [
            { id: 0, name: "Luigi Ragusa", sentence: "Uno dei migliori servizi che ho trovato sul mercato. Mi permette di gestire la mia attività con comodità e in tutta sicurezza." },
            { id: 1, name: "Misia Pierobon", sentence: "Non ci sente mai soli mentre si mangiano gli spaghetti. Richiedono troppa attenzione" },
            { id: 3, name: "Luigi Russo", sentence: "La mia attività è cambiata da quando uso DeliveBoo. 5 stelle meritate" },
            { id: 4, name: "Federico Trimarco", sentence: "Come CEO di DeliveBoo posso dire che il nostro è un ottimo servizio!!!" },

        ];

        let index = 0;
        let count = 100;
        let counter = setInterval(timer, 5000);

        function timer() {
            count=count-1;
            if (count <= 0) {
                clearInterval(counter);
                return;
            }
            let user = users[index]
            name.textContent = '- ' + user.name
            label.textContent = user.sentence;
            index < users.length - 1 ? index++ : index = 0
        }
    }
};
