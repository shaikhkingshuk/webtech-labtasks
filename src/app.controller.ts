import { Controller, Get, Param, Post } from '@nestjs/common';
import { AppService } from './app.service';

@Controller("/admin")
export class AppController {
  constructor(private readonly appService: AppService) {}

  @Get()
  getHello(): string {
    return this.appService.getHello();
    }
    @Get('/abc')
    getHellow(): string {
        return this.appService.getHellow();
    }
    
  @Post("/updateuser/:uname/:pass")
  updateuseinfo(@Param() p): string {
      return "Username is " + p.uname + " and pass is " + p.pass;
    }
    @Post('/updateuser')
    updateuser(): string {
        return "hellow";
    }
}
