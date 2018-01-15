#Webservice
- base_url( ) : ruta del proyecto
- Soapserver WSDL: base_url() /mysoapserver
- Actualizar licencia: base_url ( ) / mysoapserver/actualizar_licencia/ (enviar id y clave)
- Comprobar: base_url ( ) / mysoapserver/comprobar/ (enviar usuario y clave)
- Obtener licencia: base_url ( ) / mysoapserver/obtenerlicencia/ (enviar email y retorna licencia)
- Devolver licencia: base_url ( ) / mysoapserver/devolverlicencia/ (enviar email y retorna tipo)

#General ejecutable 
- 1) Usar Lauch 4j  / Definir 
-- Output file: carpeta de salida exe
-- Jar: archivo jar
-- Wrapper manifest: archivo manifest para ejecutar como administrador
-- Icon: icono del instalador
-- Deteminar minima version java 1.8.0
- 2) Usar inno setup compiler
-- Deteminar informacion de la aplicacion
-- Adjuntar archivos necesarios
-- Determinar carpeta de salida