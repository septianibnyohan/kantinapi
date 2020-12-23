<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class WalletEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $jumlah;
    protected $kode_order;
   
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jumlah, $kode_order)
    {
        $this->jumlah = $jumlah;
        $this->kode_order = $kode_order;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
       return $this->from('indra.rahdian@insoft-dev.com')
                   ->view('wallet.email_wallet')
                   ->with(
                    [
                        'nama' => 'Indra Rahdian',
                        'website' => 'www.PayFazz.com',
                        'order_id' => $this->kode_order,
                        'jumlah'=>$this->jumlah
                    ]);
    }
}