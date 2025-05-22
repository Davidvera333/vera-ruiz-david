# Test info

- Name: Envío válido do formulario
- Location: C:\xampp\htdocs\vera-ruiz-david\vera-ruiz-david\tests\formulario.spec.js:3:1

# Error details

```
Error: page.goto: Protocol error (Page.navigate): Cannot navigate to invalid URL
Call log:
  - navigating to "vera-ruiz-david/index.php", waiting until "load"

    at C:\xampp\htdocs\vera-ruiz-david\vera-ruiz-david\tests\formulario.spec.js:4:14
```

# Test source

```ts
   1 | const { test, expect } = require('@playwright/test');
   2 |
   3 | test('Envío válido do formulario', async ({ page }) => {
>  4 |   await page.goto('vera-ruiz-david/index.php');
     |              ^ Error: page.goto: Protocol error (Page.navigate): Cannot navigate to invalid URL
   5 |
   6 |   await page.fill('input[name="nome"]', 'David');
   7 |   await page.fill('input[name="email"]', 'david@correo.com');
   8 |   await page.fill('textarea[name="mensaxe"]', 'Proba automatizada');
   9 |
  10 |   await page.click('button[type="submit"]');
  11 |
  12 |   await expect(page.locator('#confirmacion')).toContainText('Mensaxe enviada correctamente');
  13 | });
  14 |
  15 | test('Envío baleiro do formulario', async ({ page }) => {
  16 |   await page.goto('vera-ruiz-david/index.php');
  17 |
  18 |   // Forzar a eliminación de validación no cliente
  19 |   await page.evaluate(() => {
  20 |     const form = document.querySelector('form');
  21 |     form.removeAttribute('novalidate');
  22 |     form.noValidate = true;
  23 |   });
  24 |
  25 |   // Forzar envío aínda que os campos estean baleiros
  26 |   await page.$eval('form', form => form.submit());
  27 |
  28 |   // Agardar polos erros xerados polo servidor
  29 |   await expect(page.locator('.erro')).toBeVisible();
  30 | });
```