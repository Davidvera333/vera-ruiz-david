const { Builder, By, Key, until } = require('selenium-webdriver');

(async function testFormulario() {
    // Crear una instancia del navegador (Chrome en este caso)
    let driver = await new Builder().forBrowser('chrome').build();

    try {
        // Navegar al formulario
        await driver.get('http://localhost/vera-ruiz-david/vera-ruiz-david/index.php');

        // Llenar el formulario
        await driver.findElement(By.name('nome')).sendKeys('');
        await driver.findElement(By.name('email')).sendKeys('.');
        await driver.findElement(By.name('mensaxe')).sendKeys('Esta é unha proba.');

        // Enviar el formulario
        await driver.findElement(By.css('button[type="submit"]')).click();

        // Esperar a que aparezca el mensaje de confirmación
        let confirmacion = await driver.wait(until.elementLocated(By.id('confirmacion')), 5000);

        // Verificar el texto del mensaje de confirmación
        let textoConfirmacion = await confirmacion.getText();
        console.log('Mensaje de confirmación:', textoConfirmacion);

    } catch (err) {
        console.error('Error durante la prueba:', err);
    } finally {
        // Cerrar el navegador
        await driver.quit();
    }
})();