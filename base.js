const todoList = [];
const baseTodoId = 'todoitem';

function deleteElement(id) {
    // находим по id индекс элемента, который нужно удалить
    const index = todoList.findIndex(item => item.id === id);
    // удаляем элемент из массива
    todoList.splice(index, 1);
    // находим по id карточку элемента в шаблоне и удаляем
    document.getElementById(baseTodoId + id).remove();
}
function addToDo() {
  // получаем форму из нашего html
  const form = document.forms.toDoForm;
  // достаем значения каждого из полей ввода
  const title = form.elements.title.value.trim();
  const description = form.elements.description.value.trim();

  // Проверяем, что оба поля (название и описание) не пустые
  if (title === "" || description === "") {
      // Выводим сообщение или делаем другую обработку, чтобы предупредить пользователя о необходимости заполнить все поля
      alert("Пожалуйста, заполните все поля для создания задачи.");
      return; // Прерываем выполнение функции, чтобы задача не создалась
  }

  const newTodo = {
      id: createNewId(), // вызываем нашу функцию, создающую id для элемента
      title: title,
      color: form.elements.color.value,
      description: description
  };
  todoList.push(newTodo);
  addToDoToHtml(newTodo);

  // Очищаем поля формы после добавления задачи
  form.elements.title.value = "";
  form.elements.color.value = "#000000"; // Можно установить значение по умолчанию для цвета
  form.elements.description.value = "";
}

function createNewId() {
   
    return todoList.length === 0 ?
        1 : Math.max(
            ...todoList.map(todo => todo.id)
        ) + 1;
}

function addToDoToHtml(newToDo) {
    // создаем div для нового элемента
    const div = document.createElement('div');
    // присваиваем div id нашего элемента
    div.id = baseTodoId + newToDo.id;
    // указываем свойство класса
    div.className = 'row my-3';

    // добавляем html код содержимого для элемента
    // при этом вставляем в него текст из полей переменной "newToDo"
    // для этого используем кавычки ``,
    // а когда нам нужно вставить посреди текста переменную - используем ${*название переменной*}
    div.innerHTML = `<div class="col">
                        <div class="card">
                            <div class="card-header" style="height: 35px; background-color: ${newToDo.color}"></div>
                            <div class="card-body">
                                <h5 class="card-title"> ${newToDo.title} </h5>
                                <p class="card-text"> ${newToDo.description} </p>
                                <button type="button" class="btn btn btn-link"
                                        onclick="deleteElement(${newToDo.id})"> Удалить задачу </button>
                            </div>
                        </div>
                     </div>`
    // добавляем наш элемент в контейнер из шаблона
    document.getElementById('toDoContainer').append(div);
}
