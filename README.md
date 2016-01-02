# Scabbia2 PHP Components

**Scabbia2** is a set of open source PHP components.


## Available Components

### [Config](https://github.com/eserozvataf/scabbia2-config)
A configuration compiler which supports binding multiple configuration files.

### [Events](https://github.com/eserozvataf/scabbia2-events)
Simple event dispatcher allows registering callbacks to some events and chain execution of them.

### [Formatters](https://github.com/eserozvataf/scabbia2-formatters)
Simple abstraction layer which helps scabbia2 to generate output in various formats such as Html, Console and etc.

### [Helpers](https://github.com/eserozvataf/scabbia2-helpers)
The swiss knife for rest of the scabbia2 components. Includes most commonly used helper methods filed under `Arrays`, `Date`, `FileSystem`, `Html`, `Runtime` and `String` static classes.

### [LightStack](https://github.com/eserozvataf/scabbia2-lightstack)
Simple abstraction layer which constructs `Middleware`, `Request` and `Response` concepts will be shared with other components or codes.

### [Router](https://github.com/eserozvataf/scabbia2-router)
Simple routing dispatcher which resolves and dispatchs the routes to callbacks or controllers.

### [Scanners](https://github.com/eserozvataf/scabbia2-scanners)
Scans the source directories and compiles some information. It is basically designed for extracting annotations from docblocks but functionality can be extended by implementing `Scabbia\Scanners\ScannerInterface`.

### [Services](https://github.com/eserozvataf/scabbia2-services)
Tiny dependency management container implementation allow you to share, produce and access instances/variables easily.

### [Tasks](https://github.com/eserozvataf/scabbia2-tasks)
Tasks component. Also provides an command line tool named `scabbia` and `Scabbia\Tasks\TaskBase` base class to help users create specific tasks with them. These tasks can be started in source code or command line.

### [Testing](https://github.com/eserozvataf/scabbia2-testing)
Unit testing framework and environment. Simply execute `./vendor/bin/scabbia scabbia:testing:test` to start unit tests.

### [Yaml](https://github.com/eserozvataf/scabbia2-yaml)
YAML parser allows serialization and deserialization in YAML format.

## In Planning

### [Framework](https://github.com/eserozvataf/scabbia2-fw)
A framework project forged with Scabbia2 components.


## Links
- [Documentation](https://readthedocs.org/projects/scabbia2-documentation)
- [Twitter](https://twitter.com/eserozvataf)
- [License Information](LICENSE)


## Contributing
It is publicly open for any contribution. Bugfixes, new features and extra modules are welcome.

* To contribute to code: Fork the repo, push your changes to your fork, and submit a pull request.
* To report a bug: If something does not work, please report it using GitHub issues.
* To support: [![Donate](https://img.shields.io/gratipay/eserozvataf.svg)](https://gratipay.com/eserozvataf/)
