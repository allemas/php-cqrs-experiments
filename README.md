# Deggolok Ogame

Deggolok est un demon qui récupère l'etat d'un univers ogame et exécute plusieurs commandes.


## UsesCases
- Status des joueurs : Pour les joueurs nouvellement actif / inactif
- Evolution de points : Pour determiner les cas de fastclic
- alerting discord

[Based on Ogame API](https://board.origin.ogame.gameforge.com/index.php/Thread/3927-OGame-API/)

## Entity 
- Universe
- Players


 ## Concepts
 - phase 1 #CQRS PHP native Command/Bus (no magic kafka here)
 - 
 - Domain segregation : VA / Entity 
 - Services : Infrastructure (WS) isolation 
 - Mongodb collections concepts
  
  
  
  
  
  
  
  
 ## Ressources 
 - [BusCommand](https://matthiasnoback.nl/2015/01/responsibilities-of-the-command-bus/) 
 - [CQRS Blog PHP](https://github.com/skremiec/hexagonal-architecture-cqrs-example) 
 - [Implementing Domain-Driven Design in PHP](https://dzone.com/articles/implementing-domain-driven-design-in-php) 
 - [Responsibilities of the command bus](https://matthiasnoback.nl/2015/01/responsibilities-of-the-command-bus/) 
 - [PHP DDD repo](https://github.com/php-ddd/command) 
 - [node-js-with-ddd-cqrs-and-event-sourcing](https://medium.com/@qasimsoomro/building-microservices-using-node-js-with-ddd-cqrs-and-event-sourcing-part-1-of-2-52e0dc3d81df) 