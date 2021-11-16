# 解决WSL2子系统CPU占用过高

## 前言

> 当你无意间发现 `Vmmem` 进程占用了大量的 CPU 时，你就发现了 Win WSL2 子系统占用过高的 BUG。
>
> 没错，我便是发现电脑无端发热异常才找到了这个 BUG，按照网上的教程解决了。

## 解决

### 1. 在用户目录创建 `.wslconfig` （为 WSL 进行配置）

### 2. 写入以下内容保存

```ini
[wsl2]
memory=2GB
swap=0
```

### 3. 执行以下命令(推荐在 PowerShell 中执行)

```bash
wsl --shutdown
```

## 由此，你便解决了问题，下次 Vemem 进程便不会再占用超高了！

