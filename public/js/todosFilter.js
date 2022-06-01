/** get the Element conytaining all the todos list */
const todosElement = document.getElementById('todos_list');

/**get all the todo elements  */
const elements = document.querySelectorAll('section');

/** event   */
function change(value) {
    const attribute = value.getAttribute('data-set');

    if (attribute == 'all') {
        [...elements].forEach((element) => {
            element.classList.remove('hidden');
        });
        return;
    }

    if (attribute == 'done') {
        [...elements].forEach((element) => {
            const elementAttributeStatus = element.getAttribute('data-status');
            if (elementAttributeStatus == 1) {
                element.classList.remove('hidden');
            } else if (elementAttributeStatus == 0) {
                element.classList.add('hidden');
            } else {
                return;
            }
        });
    } else if (attribute == 'notDone') {
        [...elements].forEach((element) => {
            const elementAttributeStatus = element.getAttribute('data-status');
            if (elementAttributeStatus == 0) {
                element.classList.remove('hidden');
            } else if (elementAttributeStatus == 1) {
                element.classList.add('hidden');
            } else {
                return;
            }
        });
    } else {
        [...elements].forEach((element) => {
            const elementAttribute = element.getAttribute('data-priority');
            const elementAttributeStatus = element.getAttribute('data-status');
            console.log(elementAttributeStatus);
            if (elementAttribute === attribute && elementAttributeStatus === '0') {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        });
    }

}
