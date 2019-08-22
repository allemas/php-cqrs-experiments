_L'objectif de ce projet est d'approcher les contraintes d'architecture CQS/CQRS et de DomainDrivenDesign._


# Deggolok Ogame
Deggolok est un daemon capable de comprendre l'évolution des status et des score des joueurs OGameFR. 

## UsesCases
- Status des joueurs : Pour les joueurs nouvellement actif / inactif
- Evolution de points : Pour determiner les cas de fastclic
- alerting discord

[Based on Ogame API](https://board.origin.ogame.gameforge.com/index.php/Thread/3927-OGame-API/)

## Entity
- Players
   - Names : Peuvent changer et doivent être historisés
   - Score : Evolution des scores
   - Status: status du joueur

 ## Concepts
 - Command/query bus 
 - Command/Query handler
 - Domain Segregation 
 - Services : Appels aux couches infrastructure découplé du domaine et des handlers.
 - Eventsourcing : Pas encore fait
 
 ## Technical 
 - Fromscratch Application 
 - Mongodb ORM 
 
 ## Ressources 
 - [BusCommand](https://matthiasnoback.nl/2015/01/responsibilities-of-the-command-bus/) 
 - [CQRS Blog PHP](https://github.com/skremiec/hexagonal-architecture-cqrs-example) 
 - [Implementing Domain-Driven Design in PHP](https://dzone.com/articles/implementing-domain-driven-design-in-php) 
 - [Responsibilities of the command bus](https://matthiasnoback.nl/2015/01/responsibilities-of-the-command-bus/) 
 - [PHP DDD repo](https://github.com/php-ddd/command) 
 - [node-js-with-ddd-cqrs-and-event-sourcing](https://medium.com/@qasimsoomro/building-microservices-using-node-js-with-ddd-cqrs-and-event-sourcing-part-1-of-2-52e0dc3d81df) 
 - [Mongodb doctrine ORM](https://www.doctrine-project.org/projects/doctrine-mongodb-odm/en/1.2/tutorials/getting-started.html#usage) 