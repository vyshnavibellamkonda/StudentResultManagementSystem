const btn = document.getElementById('btn');

btn.addEventListener('click', function handleClick(event) {

  event.preventDefault();

  const firstNameInput = document.getElementById('pass');
  console.log(firstNameInput.value);

  firstNameInput.value = '';
});