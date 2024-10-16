# Utilizza l'immagine base di Node.js
FROM node:18

# Imposta la directory di lavoro all'interno del container
WORKDIR /app

# Copia il package.json e il package-lock.json
COPY package*.json ./

# Installa le dipendenze
RUN npm install

# Copia tutto il contenuto del progetto nel container
COPY . .

# Espone la porta 3000 per il frontend Nuxt
EXPOSE 3000

# Comando per avviare il server di sviluppo
CMD ["npm", "run", "dev"]
