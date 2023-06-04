# Docker Cheat Sheet

<!-- MarkdownTOC -->

- [Build, Start, and Shutdown](#build-start-and-shutdown)
- [Common Commands (Container, Image, Volume)](#common-commands-container-image-volume)
- [Docker Container](#docker-container)
- [Docker Image Commands](#docker-image-commands)
- [Docker Volume Commands](#docker-volume-commands)
- [Laravel Sail](#laravel-sail)

<!-- /MarkdownTOC -->


## Build, Start, and Shutdown
<div class="code-first-col code-second-col"></div>

| Syntax                                   | Alias   | Action |
| :--------------------------------------- | :------ | :----- |
| docker-compose build                     | dcbuild |        |
| docker-compose down                      | dcdown  |        |
| docker-compose up                        | dcup    |        |
| docker exec -it <id> /bin/bash           | docksh  |        |
| docker ps --format "{{.ID}}  {{.Names}}" | dockps  |        |

Useful Docker Commands

    docker network ls              # List all the networks
    docker container restart <id>  # Restart a container
    docker container stop    <id>  # Stop a container
    docker container start   <id>  # Start a container

<a id="common-commands-container-image-volume"></a>
## Common Commands (Container, Image, Volume)
<div class="code-first-col"></div>
<div class="code-first-col"></div>
| Syntax                                  | Action                                             |
| :-------------------------------------- | :------------------------------------------------- |
| docker {container\|image\|volume} ls    | List containers, images or volumes                 |
| docker {container\|image\|volume} prune | Remove stopped containers, unused image or volumes |
| docker {container\|image\|volume} rm    | Remove one or more containers, images or volumes   |

<div class="code-first-col"></div>
| Syntax                 | Action                                                       |
| :--------------------- | :----------------------------------------------------------- |
| docker ps -a           | List all processes                                           |
| docker rm [NAME]       | Remove container                                             |
| docker run --rm [NAME] | Remove container after it runs (deletes from docker desktop) |
| docker stats           |                                                              |
| docker stop [NAME]     | Stop container                                               |
| docker build .         | Build `Docker` file in current directory                     |

<a id="docker-container"></a>
## Docker Container
https://docs.docker.com/engine/reference/commandline/container/
<div class="code-first-col"></div>
| Syntax                | Action                              |
| :-------------------- | :---------------------------------- |
| docker container kill | Kill one or more running containers |

<a id="docker-image-commands"></a>
## Docker Image Commands
<div class="code-first-col"></div>
| Syntax                                     | Action                           |
| :----------------------------------------- | :------------------------------- |
| docker image rm [OPTIONS] IMAGE [IMAGE...] | Remove image from disk           |
| docker images                              | List all images on local machine |
| docker image prune [OPTIONS]               | Remove all unused local volumes  |

<a id="docker-volume-commands"></a>
## Docker Volume Commands
<div class="code-first-col"></div>
| Command                                 | Description                                         |
| :-------------------------------------- | :-------------------------------------------------- |
| docker volume create [OPTIONS] [VOLUME] | Create a volume                                     |
| docker volume inspect                   | Display detailed information on one or more volumes |
| docker volume update                    | Update a volume (cluster volumes only)              |

<a id="laravel-sail"></a>
## Laravel Sail
<div class="code-first-col"></div>
| Syntax     | Action                      |
| :--------- | :-------------------------- |
| sail stop  | Stop Sail                   |
| sail up    | Start Sail                  |
| sail up -d | Start Sail in "detach" mode |
