## Scarlett Solo Settings

1. **Sample Rate:**
    
    - 44.1 kHz for most guitar work
    - Only go to 48 kHz or higher if you specifically need it for film scoringE

2. **Buffer Size Optimization:**
    
    - For recording: Try 128 or even 64 samples for lower latency (better for real-time monitoring)
    - For mixing: Increase to 512 or 1024 samples for better CPU performance
    - Start with 128 and adjust based on your computer's performance
    

![[Pasted image 20250916161701.png]]

## Studio One Pro Audio Setup

**Studio One → Options → Audio Setup**

### Audio Device:
    
	These settings should match your Scarlett Solo configuration:
    
### Processing:

- Set "Dropout Protection" to High or Maximum
- Enable Plug-in Nap
- Enable low latency monitoring

![[Pasted image 20250916162818.png]]

## Disable Plugins

![[Pasted image 20250916163705.png]]




<!-- REVIEW -->
## Recording-Specific Optimizations

- **Freeze tracks** after recording to reduce CPU load
- **Disable real-time effects** on other tracks while recording
- Use **Low Latency Monitoring** mode during recording
    - Song → Low Latency Monitoring (or press "Z")

### Guitar-Specific Recording Settings:

**Input Setup:**

1. Create a new audio track
2. Set input to "Input 1 (Mono)" for your guitar
3. Enable input monitoring to hear yourself
4. Arm the track for recording

**Monitoring:**

- Use Direct Monitoring on the Scarlett (the monitor knob) for zero-latency monitoring
- Or use Studio One's Low Latency Monitoring with minimal effects

**Recommended Signal Chain:**

1. Guitar → Scarlett Solo Input 1
2. Keep the gain knob around 12 o'clock (adjust so the green light stays on, occasional amber is OK)
3. Monitor through headphones or studio monitors connected to the Scarlett

Looking at your Studio One plugin support list, here's what you can safely disable for guitar recording to improve performance:

## **Safe to Disable for Guitar Recording:**

**Definitely Disable:**

- **Video Support** - Unless you're doing video scoring
- **CD Burning Support** - Rarely needed during recording/production
- **Remote Control Support** - Only needed for hardware controllers
- **Windows Audio Support** - You're using ASIO, so this is redundant
- **Windows MIDI Support** - If you're only recording guitar (no MIDI keyboards)

**Probably Disable:**

- **Ableton Link Support** - Only needed if syncing with Ableton Live or other Link-compatible apps
- **Spatial Audio Support** - Advanced mixing feature, not needed for basic guitar recording
- **ARA Plug-In Support** - Advanced audio editing (like Melodyne integration) - disable unless you specifically use ARA plugins

## **Keep Enabled for Guitar Work:**

**Essential:**

- **ASIO Driver Support** - Critical for your Scarlett Solo
- **VST 3 Plug-In Support** - Most modern guitar amp sims and effects
- **VST 2.4 Plug-In Support** - Many guitar plugins still use VST 2.4

**Useful:**

- **External Device Support** - Good to keep for future hardware
- **PreSonus Hardware Support** - Useful if you add PreSonus gear later
- **CLAP Plug-In Support** - Growing plugin format, worth keeping

## **How This Helps Performance:**

- Reduces Studio One's startup time
- Decreases RAM usage
- Eliminates background processes you're not using
- Reduces potential conflicts between different audio systems



The biggest performance gains will come from disabling **Windows Audio Support** and **Video Support** since these can create conflicts with your ASIO driver setup.