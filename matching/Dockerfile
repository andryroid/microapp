FROM node:gallium-slim as build
RUN npm install -g typescript
WORKDIR /app
COPY ./matching/ .
EXPOSE 3000
