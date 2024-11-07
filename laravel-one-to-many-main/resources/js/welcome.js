console.log('test')

let doneButton = document.querySelectorAll('.done')

for (let i = 0; i < doneButton.length; i++) {
    doneButton[i].addEventListener('click', function (event) {
        event.preventDefault();
        console.log(doneButton[i])
    })
}
