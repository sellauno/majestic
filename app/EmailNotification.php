use App\Models\User;

public function __construct(User $user)
{
    $this->user = $user;
}
public function toMail($notifiable)
{
    return (new MailMessage)
                ->greeting('Hello, '.$this->user->name)
                ->line('Welcome to Codelapan.')
                ->action('Explore', url('/'))
                ->line('Thank you for using our application!');
}