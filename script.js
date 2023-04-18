let rows = document.querySelectorAll(".row");

rows.forEach((el, i) => {
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
        console.log("delete triggered!");
        rows[i].remove();

        // refresh new row children
        rows = document.querySelectorAll(".row");

        // then adjust numbering again
        for (it = i; it < rows.length; it++) {
            rows[it].children[0].textContent = it+1;
        }
    });
});