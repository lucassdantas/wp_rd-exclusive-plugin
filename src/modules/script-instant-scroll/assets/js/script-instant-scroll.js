document.addEventListener('DOMContentLoaded', function () {
  console.log('rdeInstantScrollData')
  console.log(rdeInstantScrollData)
    if (typeof rdeInstantScrollData === 'undefined' || !rdeInstantScrollData.selector) return;

    document.querySelectorAll(rdeInstantScrollData.selector).forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const targetElement = document.querySelector('#formContainer');
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'instant' });
            }
        });
    });
});
