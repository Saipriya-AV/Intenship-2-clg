document.addEventListener("DOMContentLoaded", function () {
    const taskInput = document.getElementById("taskInput");
    const dueDateInput = document.getElementById("dueDateInput");
    const addTaskButton = document.getElementById("addTask");
    const taskList = document.getElementById("taskList");
    const themeToggle = document.getElementById("themeToggle");
    const searchInput = document.getElementById("searchInput");
    const sortTasks = document.getElementById("sortTasks");

    //Dark/Light theme
    themeToggle.addEventListener("change", function () {
        
        document.getElementById("task-container").classList.toggle("dark-theme");
    });

    // Get tasks from Local Storage
    let tasks = JSON.parse(localStorage.getItem("tasks")) || [];

    // Save to Local Storage
    function saveTasks() {
        localStorage.setItem("tasks", JSON.stringify(tasks));
    }


    //Add new task item
    function createTaskItem(taskObj) {
        const li = document.createElement("li");
        li.classList.add("task", "list-group-item", "d-flex", "align-items-center");

        const taskCheckbox = document.createElement("div");
        const checkboxLabel = document.createElement("label");
        checkboxLabel.classList.add("custom-checkbox");

        const checkboxInput = document.createElement("input");
        checkboxInput.type = "checkbox";
        
        const checkmark = document.createElement("span");
        checkmark.classList.add("checkmark");
        const checkmarkIcon = document.createElement("i");
        checkmarkIcon.classList.add("fas", "fa-check");
        checkmark.appendChild(checkmarkIcon);

        checkboxLabel.appendChild(checkboxInput);
        checkboxLabel.appendChild(checkmark);

        taskCheckbox.appendChild(checkboxLabel);

        const text = document.createElement("div");
        text.classList.add("text");
        text.textContent = taskObj.text;

        const dueDate = document.createElement("div");
        dueDate.classList.add("due-date");
        dueDate.textContent = taskObj.dueDate;

        const taskEdit = document.createElement("div");
        taskEdit.classList.add("task-edit");
        taskEdit.innerHTML = '<i class="fas fa-edit"></i';
        taskEdit.addEventListener("click", function () {
            const updatedTaskText = prompt("Edit task:", taskObj.text);
            if (updatedTaskText !== null) {
                taskObj.text = updatedTaskText;
                text.textContent = updatedTaskText;
                saveTasks();
            }
        });

        const taskDelete = document.createElement("div");
        taskDelete.classList.add("task-delete");
        taskDelete.innerHTML = '<i class="fas fa-trash"></i>';
        taskDelete.addEventListener("click", function () {
            const index = tasks.indexOf(taskObj);
            if (index !== -1) {
                tasks.splice(index, 1);
                li.remove();
                saveTasks();
            }
        });

        li.appendChild(taskCheckbox);
        li.appendChild(text);
        li.appendChild(dueDate);
        li.appendChild(taskEdit);
        li.appendChild(taskDelete);

        if (taskObj.completed) {
            checkboxInput.checked = true;
            text.style.textDecoration = "line-through"; 
        }

        checkboxInput.addEventListener("change", function () {
            taskObj.completed = checkboxInput.checked;
            saveTasks();
            text.style.textDecoration = taskObj.completed ? "line-through" : "none"; 
        });

        return li;
    }

    
    //Add a new task
    function addNewTask() {
        const taskText = taskInput.value.trim();
        const dueDate = dueDateInput.value;

        if (taskText === "") {
            alert("Task cannot be empty");
            return;
        }

        const newTask = { text: taskText, completed: false, dueDate: dueDate };
        tasks.push(newTask);
        const taskItem = createTaskItem(newTask);
        taskList.appendChild(taskItem);
        saveTasks();
        taskInput.value = "";
        dueDateInput.value = "";
    }

    // Sorting
    function sortTasksBy(property) {
        return function (a, b) {
            if (a[property] < b[property]) return -1;
            if (a[property] > b[property]) return 1;
            return 0;
        };
    }

    addTaskButton.addEventListener("click", addNewTask);

    sortTasks.addEventListener("change", function () {
        const sortValue = sortTasks.value;
        if (sortValue === "date") {
            tasks.sort(sortTasksBy("dueDate"));
        } else if (sortValue === "alphabetical") {
            tasks.sort(sortTasksBy("text"));
        }

        taskList.innerHTML = "";
        tasks.forEach(function (task) {
            if (searchInput.value === "" || task.text.toLowerCase().includes(searchInput.value.toLowerCase())) {
                const taskItem = createTaskItem(task);
                taskList.appendChild(taskItem);
            }
        });
    });
    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();
        taskList.innerHTML = "";
        tasks.forEach(function (task) {
            if (searchTerm === "" || task.text.toLowerCase().includes(searchTerm)) {
                const taskItem = createTaskItem(task);
                taskList.appendChild(taskItem);
            }
        });
    });

    // Local Storage
    tasks.forEach(function (task) {
        const taskItem = createTaskItem(task);
        taskList.appendChild(taskItem);
    });
});
