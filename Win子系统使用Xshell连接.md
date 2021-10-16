# Win 子系统使用 Xshell 连接

## 描述

> 默认情况下，安装好 Windows 下的子系统 Ubuntu Linux 系统是不能正常使用 Xshell 连接的。

## 问题解决

1. 查看子系统 ip (一般为 127.0.0.1 )
2. 配置 SSH 服务
3. 使用 Xshell 连接登录

### 查看子系统 ip

> 在子系统默认命令端输入 ```ifconfig``` 即可查看子系统的内网 ip

![子系统查看ip](![子系统查看ip.jpg](https://i.loli.net/2021/10/16/1sfibae2CQHLWul.jpg))

### 配置 SSH 服务

* 先删除 ssh

```bash
sudo apt-get remove --purge openssh-server
```

* 再安装 ssh

```bash
sudo apt-get install openssh-server
```

* 删除配置文件

```bash
sudo rm /etc/ssh/ssh_config
```

* 启动 ssh

```bash
sudo service ssh --full-start
```

## 使用 Xshell 连接子系统

> 上面的过程进行完成后，便可通过 Xshell 连接子系统(配置好用户名、登录密码、主机地址和端口)

## 配置永久解决方案

### 问题

> 上面的过程执行完后，若是断开之后重新开机，我们又要重新配置 SSH 。因此，我们不如配置一下永久解决方案。

### 步骤

1. 在默认目录（登录到子系统时的目录）创建一个 ```ssh_service.sh``` 文件（自行简写名称）
2. 在文件中写入 ```sudo service ssh --full-restart```

3. 下次开机使用子系统时执行 ```sh ssh_service.sh```（ssh_service.sh 与第1步文件名一致）

#### 创建文件

```bash
touch ssh_service.sh
```

#### 写入命令（具体写入方法百度）

```bash
vi ssh_service.sh
```

#### 开机执行命令

```bash
sh ssh_service.sh
```

