# travware_1

## Requirements
- PHP ^8.1

## Installation
- 1. download project

- 2. run OrderTest.php
```bash
./vendor/bin/phpunit OrderTest.php
```
## Note

This design adheres to the Open/Closed Principle, making it easier to add new shipping companies or modify tax calculation logic without modifying existing code.

The design pattern used in the provided code is the *Strategy Pattern*. The Strategy Pattern defines a family of algorithms, encapsulates each algorithm, and makes them interchangeable. It allows the client to choose the appropriate algorithm at runtime without modifying the client's code.

In the example, the TaxCalculator interface represents the strategy, and AramexTaxCalculator and FedexTaxCalculator are concrete strategies implementing the tax calculation algorithms. The ShippingCompany class acts as the context that uses the selected strategy for tax calculation. This pattern promotes a clean separation of concerns and facilitates the addition of new tax calculation strategies without modifying the existing code.
