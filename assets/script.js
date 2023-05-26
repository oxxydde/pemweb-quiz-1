let rows = document.querySelectorAll(".row");
let activeEditElement = null;
let addSection = document.querySelector("#add.inner");
let editSection = document.querySelector(".edit-container");
let oldData = { "no": null, "nim": null, "nama": null, "prodi": null, "email": null };

const manageData = (bodyData, method) => {
    fetch('manage.php', {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: bodyData
    }).then((returnValue) => {
        returnValue.text().then((response) => {
            if (response == 'success') {
                alert(`${method} success!`);
                location.reload();
                return;
            } alert(`${method} failed!`);
        })
            .catch(() => alert(`${method} failed`));
    })
        .catch(() => alert(`${method} failed!`));
};

// Add mahasiswa
addSection.querySelector("#add-confirm").addEventListener('click', () => {
    // change this to fetch POST PHP later
    const cols = ["nim", "nama", "prodi", "email"];
    let postData = "method=tambah";
    const newInput = addSection.querySelectorAll("input[type=text]");
    cols.forEach((col, i) => {
        postData += `&${col}=${newInput[i].value}`
    });
    console.log(postData);
    manageData(postData, 'Add');
});

// Action button listener
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
            if (j > 1) {
                editInputs[j - 2].value = oldData[col];
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
            // change this to fetch POST PHP later
            const cols = ["nim", "nama", "prodi", "email"];
            let postData = "method=update";
            const newInput = editSection.querySelectorAll("input[type=text]");
            cols.forEach((col, i) => {
                postData += `&${col}=` + ((i <= 0) ? oldData["nim"] : newInput[i - 1].value)
            });
            manageData(postData, 'Update');
            resetState();
        };
        
        const goCancel = () => {
            resetState();
        };
        
        editSection.querySelector('#update-confirm').addEventListener('click', goUpdate);
        editSection.querySelector('#cancel-confirm').addEventListener('click', goCancel);
    });
    
    deleteBtn.addEventListener('click', () => {
        const cols = ["nim", "nama", "prodi", "email"];
        const nim = el.children[1].textContent;
        let postData = "method=hapus";
        const newInput = editSection.querySelectorAll("input[type=text]");
        cols.forEach((col, i) => {
            postData += `&${col}=` + ((i <= 0) ? nim : newInput[i - 1].value)
        });
        const confirmation = confirm("Apakah anda yakin menghapus data ini?");
        if (confirmation) {
            manageData(postData, 'Delete');
            resetState();
        }
    });
});