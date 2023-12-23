В данном проекте предоставлены примеры данных, которые могут быть использованы для реализации веб приложения 'АРМ дежурного жд станции'

db.json - Содержит доступные маршруты и примеры данных

Для разворачивания сервера необходимо:
Выполнить команду npm install/yarn install для установки зависимостей
Выполнить команду npm start/yarn start для запуска сервера

Документация json-server доступна по адресу: https://www.npmjs.com/package/json-server/v/0.17.0
Сервер доступен по адресу: http://localhost:4000

Доступные ресурсы:
http://localhost:4000/stationsList
http://localhost:4000/stationsData
http://localhost:4000/wagonTypeList
http://localhost:4000/ownersList
http://localhost:4000/operationsTypesNorms
http://localhost:4000/operationsTypes
http://localhost:4000/operationsList
http://localhost:4000/operationReasonsList

При обнаружении ошибки в данных, необходимо внести правки самостоятельно. 
При необходимости, можно редактировать данные, добавлять новые.
Для обновления данных, можно отправлять POST, PATCH запросы, которые меняют исходные данные, данный процесс описан в документации json-server.