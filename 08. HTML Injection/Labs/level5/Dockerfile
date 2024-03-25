FROM node:latest

RUN npm install -g nodemon
COPY ./src/package*.json ./
RUN npm install --save

WORKDIR /app

COPY ./src .

CMD ["npm", "start"]
