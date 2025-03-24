# Windows Subsystem for Linux (WSL) on Windows


<div class="txt-red">Open terminal as admin</div>



1. Run `wsl --install` to install WSL2
2. Restart your computer
3. Run `wsl --set-default-version 2` to set WSL2 as the default version
4. 


## Trouble Shooting

Press Win + R, type optionalfeatures, and press Enter.
Find Virtual Machine Platform and Windows Subsystem for Linux.
Check both, click OK, then Restart your computer.

Once installed update the distribution

```bash

```





## Additional Resources

- <a href="https://www.youtube.com/watch?v=wz0QBNy9i7w" target="blank">https://www.youtube.com/watch?v=wz0QBNy9i7w</a>
- <a href="https://learn.microsoft.com/en-us/windows/wsl/install" target="blank">https://learn.microsoft.com/en-us/windows/wsl/install</a>

You're getting the error because **WSL2 requires virtualization**, which isn't enabled on your system. You need to enable the **Virtual Machine Platform** and ensure **virtualization is enabled in BIOS**. Follow these steps:

---

### **1. Enable Virtual Machine Platform (Windows Feature)**
Run the following command in **PowerShell as Administrator**:  
```
wsl.exe --install --no-distribution
```
OR manually:
1. Press **Win + R**, type `optionalfeatures`, and press **Enter**.
2. Find **Virtual Machine Platform** and **Windows Subsystem for Linux**.
3. Check both, click **OK**, then **Restart** your computer.

---

### **2. Enable Virtualization in BIOS**
If the above step didn’t work, you **must enable virtualization in BIOS**:
1. Restart your computer and enter **BIOS/UEFI** (usually by pressing **F2, F10, Delete, or Esc** during boot).
2. Look for an option called **Intel VT-x**, **AMD-V**, or **SVM Mode** under **Advanced > CPU Configuration**.
3. **Enable** it, then **Save & Exit**.
4. Boot back into Windows and try the install command again:
   ```
   wsl.exe --install
   ```

---

### **3. Check if Virtualization is Enabled**
To confirm if virtualization is enabled:
1. Open **Task Manager** (`Ctrl + Shift + Esc`).
2. Go to the **Performance** tab.
3. Click **CPU** and look for **Virtualization** on the right.
   - If it says **Enabled**, you're good to go.
   - If **Disabled**, you need to enable it in BIOS.

---

### **4. Retry WSL Installation**
After enabling everything, run:
```
wsl.exe --install
```
If it still fails, try:
```
wsl --set-default-version 1
```
to use WSL1 instead of WSL2.

---

Let me know if you need further troubleshooting.