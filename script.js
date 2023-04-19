let rows = document.querySelectorAll(".row");
let activeEditElement = null;
let editSection = document.querySelector(".edit-container");
let oldData = { "no": null, "nim": null, "nama": null, "prodi": null, "email": null };

rows.forEach((el) => {
    let updateBtn = el.querySelector('.update'),
        deleteBtn = el.querySelector('.delete');

    // Attempt updating when clicked 
    updateBtn.addEventListener('click', () => {
        console.log("update triggered!");

        if (activeEditElement != null) {
            // Set the default state
            activeEditElement.querySelector('.update').disabled = false;
            activeEditElement.querySelector('.delete').disabled = false;
        }
        activeEditElement = el;

        // show edit section
        editSection.style = '';

        // Disable button when editing
        updateBtn.disabled = true;
        deleteBtn.disabled = true;

        let editInputs = editSection.querySelectorAll('input[type=text]');

        // Save previous data before any updates
        Object.keys(oldData).forEach((col, j) => {
            oldData[col] = el.children[j].textContent;
            if (j > 0) {
                editInputs[j-1].value = oldData[col];
            }
        });

        const resetState = () => {
            editSection.querySelector('#update-confirm').removeEventListener('click', goUpdate);
            editSection.querySelector('#cancel-confirm').removeEventListener('click', goCancel);
            activeEditElement.querySelector('.update').disabled = false;
            activeEditElement.querySelector('.delete').disabled = false;

            // hide back edit section
            editSection.style = 'display: none';
        }
    

        const goUpdate = () => {
            editInputs.forEach((inputs, j) => {
                console.log(inputs);
                activeEditElement.children[j+1].textContent = inputs.value;
            });
            resetState();
        };
        
        const goCancel = () => {
            resetState();
        };

        editSection.querySelector('#update-confirm').addEventListener('click', goUpdate);
        editSection.querySelector('#cancel-confirm').addEventListener('click', goCancel);
    });

    deleteBtn.addEventListener('click', () => {
        el.remove();

        // refresh new row children
        rows = document.querySelectorAll(".row");

        // then adjust numbering again
        rows.forEach((in_el, in_i) => {
            in_el.children[0].textContent = in_i + 1;
        });
    });
});