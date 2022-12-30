FROM node:12.20-alpine as build
WORKDIR /app
COPY ./matching/ .
EXPOSE 3000
RUN npm start
