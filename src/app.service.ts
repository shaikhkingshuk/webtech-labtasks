import { Injectable } from '@nestjs/common';

@Injectable()
export class AppService {
  getHello(): string {
      return 'Hello World!..This is my first test...This is the changed version of this topic..second test...third test....forth test';
    }
    getHellow(): string {
        return 'Hello World!..This is my last test.';
    }
}
