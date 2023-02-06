import { Body, Controller, Delete, Get, Param, Post, Put, Query } from "@nestjs/common";
import { CreateAccDto } from "./accounts.dto";
import { AccountsService } from "./accounts.service";

@Controller("/accounts")
export class AccountsController {
    constructor(private accountsService: AccountsService) { }

    @Get("/index")
    getAcc(): any {
        return "Accounts dashboard";
    }

    @Post()
    create(@Body() createaccDto: CreateAccDto) {
        return 'This action adds a new employer account.';
    }

    @Get("/index/showemployersacc")
    findAll(@Query() query: ListAllEmployers): any {
        return `This action returns all employer's details.. (limit: ${query.limit} items)`;
    }

    @Get("/index/findemployer")
    getEmpAcc( @Query() myparams:any) : string {
    return "The id is : " + myparams.id + " and his name is : " + myparams.name;
    }

    @Put("index/updateemployeraccount")
    updateempacc(

        @Body("name") name: string,
        @Body("id") id: string
        ): any {
        return "Employer's account updated named " + name + " with id " + id;
    }

    @Post('index/deleteemployer/:id')
    remove(@Param('id') id: string): string {
        return "This action removes a "+id.empacc+" emoployer's account.";
    }

}