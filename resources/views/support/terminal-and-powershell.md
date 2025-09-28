# Windows Terminal and PowerShell 7

- [PowerShell](#powershell)
    - [Making It Look Pretty with Oh My Posh](#making-it-look-pretty-with-oh-my-posh)
- [Scripting Examples](#scripting-examples)

## PowerShell

`WindowsPowerShell` is the legacy version that comes pre-installed on Windows.
`PowerShell 7` is the modern, cross-platform version with many improvements and
new features.

To set as the default shell:

1. Open Windows Terminal settings (Ctrl+,)
2. Under "Default profile", select "PowerShell 7"
3. Save the changes and restart Windows Terminal to see PowerShell 7 as the
   default shell

### Making It Look Pretty with Oh My Posh

Oh My Posh is a popular theming engine for PowerShell that allows you to customize
the appearance of your terminal prompt with themes and icons.

<a href="https://ohmyposh.dev/docs" target="blank">Official Docs</a>

**To install and set up Oh My Posh:**

```powershell +torchlight-powershell
# Install Oh My Posh
winget install JanDeDobbeleer.OhMyPosh -s winget

# Install a Nerd or NerdFontSymbolsIOnly Font (required for icons)
oh-my-posh font install
```

**Set up your PowerShell profile:**
```powershell +torchlight-powershell
# Open your profile for editing
code $PROFILE

# Add this line to enable Oh My Posh with a theme
oh-my-posh init pwsh --config "$env:POSH_THEMES_PATH\jandedobbeleer.omp.json" | Invoke-Expression
```



## Scripting Examples

```powershell +torchlight-powershell
wt -w _quake
wt -w _quake powershell -window minimized

taskkill /f /im WindowsTerminal.exe
```


function egp { 
    start "C:\Users\natha\OneDrive\Documents\Guitar Pro"
    Stop-Process -Name "WindowsTerminal" -Force
}

function egp { 
    start "C:\Users\natha\OneDrive\Documents\Guitar Pro"
    Start-Process wt -ArgumentList "-w _quake"
}


<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
# 1. Install modules
Install-Module -Name PSReadLine -Scope CurrentUser -Force
Install-Module -Name posh-git -Scope CurrentUser -Force
Install-Module -Name oh-my-posh -Scope CurrentUser -Force
Install-Module -Name Terminal-Icons -Scope CurrentUser -Force

# 2. Import modules in your profile
# Check if profile exists, create if not
if (!(Test-Path $PROFILE)) { New-Item -Type File -Path $PROFILE -Force }

# Open profile in default editor

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

# Import modules
Import-Module PSReadLine
Import-Module posh-git
Import-Module Terminal-Icons
Import-Module oh-my-posh

# Enable PSReadLine features
Set-PSReadLineOption -EditMode Windows
Set-PSReadLineOption -PredictionSource History

# Set Oh-My-Posh theme (change theme if you like)
Set-PoshPrompt -Theme Paradox

# Optional: shorter paths in prompt
$global:POSH_THEME_OPTIONS = @{
    ShortenPathLength = 2
}


Here’s a concise list of **PowerShell enhancements that actually improve
workflow and aesthetics**:

**1. Prompt/Appearance**

* **Oh-My-Posh** – Full prompt theming. Shows Git info, icons, colours,
  segments. `Install-Module oh-my-posh -Scope CurrentUser`
* **Powerlevel10k style themes** – Many themes are compatible via Oh-My-Posh.

**2. Git Integration**

* **Posh-Git** – Shows branch, status, staged/unstaged files in prompt.

**3. File/Folder Visuals**

* **Terminal-Icons** – Icons for files/folders in `ls` output.

**4. Editing & Productivity**

* **PSReadLine** – Syntax highlighting, multiline editing, key bindings. Can
  customise colours and keymaps: `Set-PSReadLineOption -EditMode Emacs` or `Vi`.

**5. Auto-Suggestions / History**

* PSReadLine can show inline suggestions from history: `Set-PSReadLineOption
  -PredictionSource History`

**6. Aliases / Shortcuts**

* Define your own functions/aliases to save typing, like:

  ```powershell
  Set-Alias ll Get-ChildItem
  function gs { git status }
  ```

**7. Themes & Colours**

* Oh-My-Posh + ligature fonts + terminal colour schemes = clean and readable.

**Optional Extras**

* **fzf** – Fuzzy finder for file paths, commands, history.
* **bat** – Cat clone with syntax highlighting.
* **exa** – Modern replacement for `ls`.

If you want, I can give you a **single PowerShell setup script that installs the
main ones and gives a clean, pretty prompt**. It’ll be lean and actually usable. -->
