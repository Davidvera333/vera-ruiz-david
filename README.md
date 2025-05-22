# Explicacion breve de como funciona paso a paso el formulario .

- El formulario , esta compuesto por un cuerpo html basico , con un formulario sacado de bootstrap .
- Esta compuesto de tres campos ( Nome - Email - Mensaxe ) , cada uno con sus validaciones respectivas .
- ademas de un boton "Ver en github" que enviara al usuario al repositorio en donde esta alojado esto .
- Este seria el enlace para las Pages de github ([ https://davidvera333.github.io/vera-ruiz-david/Ejercicio-1 ](https://davidvera333.github.io/vera-ruiz-david/index.html))
- Este seria el enlace al Repo para clonar (https://github.com/Davidvera333/vera-ruiz-david.git)
- Este es el URL del repositorio ( https://github.com/Davidvera333/vera-ruiz-david )

  # Ejercicio - 2

  -En mi caso use PlaywRight para los testeos, usando el formulario creado anteriormente , instalamos las dependencias con npx playwright install y parahacer los tests npm install -D @playwright/test, ademas de crear la carpeta tests/ que contendra los scripts , una vez con todo eso configurado, usamos npx playwright test , y nos deberia sacar un resultado tal que asi : npx playwright test

Running 2 tests using 1 worker

✓ 1 tests\formulario.spec.js:3:1 › Envío válido do formulario (1.1s)
✓ 2 tests\formulario.spec.js:15:1 › Envío baleiro do formulario (566ms)

2 passed (5.6s)
/////

# AVISO

- En esta parte del codigo deberas cambiar las urls por las que uses tu :
  (http://localhost/vera-ruiz-david/vera-ruiz-david/index.php)
  -En el archivo formulario.spec.js y test-formulario.js

test('Envío válido do formulario', async ({ page }) => {
await page.goto('http://localhost/vera-ruiz-david/vera-ruiz-david/index.php');

await page.fill('input[name="nome"]', 'David');
await page.fill('input[name="email"]', 'david@correo.com');
await page.fill('textarea[name="mensaxe"]', 'Proba automatizada');

await page.click('button[type="submit"]');

await expect(page.locator('#confirmacion')).toContainText('Mensaxe enviada correctamente');
});

test('Envío baleiro do formulario', async ({ page }) => {
await page.goto('http://localhost/vera-ruiz-david/vera-ruiz-david/index.php');

- Ya que si no , te dara error de que es incapaz de hacer los tests
