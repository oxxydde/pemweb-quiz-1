let rows = document.querySelectorAll(".row");

rows.forEach((el) => {
    // Attempt updating when clicked 
    el.querySelector('.update').addEventListener('click', () => {
        console.log("update triggered!");

        // Save previous data before any updates
        oldData = { "no": null, "nim": null, "nama": null, "program studi": null, "email": null };
        Object.keys(oldData).forEach((col, j) => {
            oldData[col] = el.children[j].textContent;
        })
    });

    el.querySelector('.delete').addEventListener('click', () => {
        el.remove();

        // refresh new row children
        rows = document.querySelectorAll(".row");

        // then adjust numbering again
        rows.forEach((in_el, in_i) => {
            in_el.children[0].textContent = in_i + 1;
        });
    });
});