import os
import re

# Nastav cestu ke složce s obrázky
folder = "C:\Users\danie\OneDrive - Střední průmyslová škola Třebíč\Plocha\garfield\www.garfieldsbaby.cz\www.garfieldsbaby.cz\kittens"  # Uprav podle potřeby

# Načti všechny soubory ve složce
files = [f for f in os.listdir(folder) if re.match(r"(.+)_\d+\.(jpg|png|jpeg)", f, re.IGNORECASE)]

# Seřaď soubory podle jména
files.sort()

# Vytvoř slovník pro uchování skupin souborů podle jména
groups = {}

for file in files:
    match = re.match(r"(.+)_\d+\.(jpg|png|jpeg)", file, re.IGNORECASE)
    if match:
        base_name = match.group(1)
        if base_name not in groups:
            groups[base_name] = []
        groups[base_name].append(file)

# Přejmenuj soubory s novým číslováním
for base_name, file_list in groups.items():
    for index, old_name in enumerate(sorted(file_list), start=1):
        ext = old_name.split(".")[-1]  # Přípona souboru
        new_name = f"{base_name}_{index}.{ext}"
        os.rename(os.path.join(folder, old_name), os.path.join(folder, new_name))
        print(f"{old_name} -> {new_name}")

print("Přejmenování dokončeno!")
